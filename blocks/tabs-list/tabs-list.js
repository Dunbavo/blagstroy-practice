import './tabs-list.mustache'

import { Tab } from '../tab/Tab'

export default () => {
  const tabsEl = document.querySelector('.tabs-list')
  let tabsInstance = null

  if (tabsEl) {
    tabsInstance = new Tab({
      selectors: {
        tab: tabsEl,
        link: '.tabs-list-link',
        panel: '.tabs-list-panel',
        panelContainer: '.tabs-list-panels'
      },
      classes: {
        panelIn: 'tabs-list-panel_in',
        panelActive: 'tabs-list-panel_active',
        panel: 'tabs-list-panel',
        linkActive: 'tabs-list-link_active'
      }
    })
  }

  return tabsInstance
}