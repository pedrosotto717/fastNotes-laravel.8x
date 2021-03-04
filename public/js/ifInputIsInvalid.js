const validator = {
  listInputs: [],

  setInput: function (input) {
    this.listInputs.push(input)
    return this
  },

  validate: function () {
    document.addEventListener('change', ev => {
      console.log('input')
      if(ev.target.matches(this.listInputs)){
        ev.target.classList.add('invalid')
      }
    });
  }
}
export default validator
