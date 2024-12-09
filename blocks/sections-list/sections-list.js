import './sections-list.mustache'

import { Tab } from '../tab/Tab'

export default () => {
  const tabsEl = document.querySelector('.section-list')
  let tabsInstance = null

  if (tabsEl) {
    tabsInstance = new Tab({
      selectors: {
        tab: tabsEl,
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

  return tabsInstance
}