
const formRequest = {
  listSelectors: [],

  set: function (selector) {
    this.listSelectors.push(selector)
  },

  execute: function () {
    document.addEventListener('click', async ev => {
      if(ev.target.matches(this.listSelectors)){
        ev.preventDefault()

        const response = await this.submit(ev.target)
        if(response.status === 200)
          location.href = await response.text()
        else
          location.reload()
      }
    });

  },

  submit:  async function (element) {
    const url = element.dataset.url,
        method = element.dataset.method ?? "",
        token = element.dataset.token,
        formData = new FormData()

        formData.append("_token", token)
        formData.append("_method", method)

    return await fetch(url, {
      method: "POST",
      body: formData
    })
  }


}

export default formRequest