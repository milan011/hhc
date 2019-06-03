
//后台用户管理路由组
import Layout from '@adminPc/views/layout/Layout'

const carRouter = {
    path: '/car',
    component: Layout,
    redirect: '/car/index',
    name: 'car',
    meta: {
      title: 'car',
      icon: 'car',
      roles: ['admin', 'manager']
    },
    children: [
      {
        path: 'index',
        component: resolve => void(require(['@adminPc/views/car/index'], resolve)),
        name: 'carList',
        meta: { title: 'carList' }
      },
    ]
}
export default carRouter