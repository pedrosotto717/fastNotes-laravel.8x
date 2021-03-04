'use strict'

import formRequest from './formRequest.js'
import validator  from './ifInputIsInvalid.js'

formRequest.set('#destroy_note')
formRequest.execute()

validator.setInput('input').validate()