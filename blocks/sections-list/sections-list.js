import './sections-list.mustache'

import { Tab } from '../tab/Tab'

export default () => {
  const section = document.querySelector('.section-list')
  let tabsInstance = null

  if (section) {
    tabsInstance = new Tab({
      selectors: {
        tab: section,
        link: '.section-list-tab',
        panel: '.section-list-panel',
        panelContainer: '.section-list-panels'
      },
      classes: {
        panelIn: 'section-list-panel_in',
        panelActive: 'section-list-panel_active',
        panel: 'section-list-panel',
        linkActive: 'section-list-tab_active'
      }
    })
  }

  const dropdown = section.querySelector('.section-list-dropdown')
  const dropdownItem = section.querySelector('.section-list-dropdown-menu-item')

  dropdown.addEventListener('click', () => {
    dropdown.classList.toggle('section-list-dropdown_open')
  })

  dropdownItem.forEach(item => {
    item.addEventListener('click', () => {
      dropdown.classList.remove('section-list-dropdown_open')
      dropdownItem.forEach(item => {
        item.classList.remove('section-list-dropdown-menu-item_active')
      })
      dropdownItem.classList.toggle('section-list-dropdown-menu-item_active')
    })
  })

  return tabsInstance
}