import {Fancybox} from "@fancyapps/ui"
import '@fancyapps/ui/dist/fancybox/fancybox.css'

window.Fancybox = Fancybox

export const fbInit = () => {
  Fancybox.bind("[data-fancybox]", {
    mainClass: "custom-fancybox",
    dragToClose: false,
  });
}

export const fbCLickCloseHandler = () => {
  document.addEventListener('click', event => {
    let close = event.target.closest('[data-fancybox-close]')

    if (close) Fancybox.close()
  })
}

export const fbInitAll = () => {
  fbInit()
  fbCLickCloseHandler()
}