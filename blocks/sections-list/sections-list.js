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

  const dropdown = section.querySelector('.section-list-dropdown');
  const dropdownButtonText = section.querySelector('.section-list-dropdown-button__text');
  const dropdownItems = section.querySelectorAll('.section-list-dropdown-menu-item');

  dropdown.addEventListener('click', (event) => {
    dropdown.classList.toggle('section-list-dropdown_open')
  })

  dropdownItems.forEach(item => {
    item.addEventListener('click', (event) => {
      dropdownButtonText.innerText = item.innerText;
      dropdown.classList.remove('section-list-dropdown_open');
      dropdownItems.forEach(i => {
        i.classList.remove('section-list-dropdown-menu-item_active');
      });
      item.classList.add('section-list-dropdown-menu-item_active');

      event.stopPropagation();
    });
  });

  return tabsInstance
}