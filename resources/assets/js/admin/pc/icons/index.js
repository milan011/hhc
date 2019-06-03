import Vue from 'vue'
import SvgIcon from '@adminPc/components/SvgIcon'// svg组件

// register globally
Vue.component('svg-icon', SvgIcon)

// const req = require.context('./svg', false, /\.svg$/)
const req = require.context('!svg-sprite-loader?{"symbolId":"icon-[name]"}!./svg', false, /.svg$/)
const requireAll = requireContext => requireContext.keys().map(requireContext)
requireAll(req)
