import request from '@adminPc/utils/request'
import { ROAST_CONFIG } from '../config.js'

export function getToken() {
  return request({
    url: '/qiniu/upload/token', // 假地址 自行替换
    method: 'get'
  })
}
