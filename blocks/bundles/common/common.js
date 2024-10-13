import loadingAttributePolyfill from 'loading-attribute-polyfill/dist/loading-attribute-polyfill.module'
import 'fonts/stylesheet.css'

import './common.sass'

window.loadingAttributePolyfill = loadingAttributePolyfill
window._ = {
  merge: require('lodash/merge'),
}

document.addEventListener('DOMContentLoaded', () => {
  detectBrowser()
})

function detectBrowser() {
  if (navigator.userAgent.includes('Firefox')) {
    document.body.classList.add('is-firefox')
  }
}