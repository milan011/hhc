import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getCustomerList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/customerList',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function customerAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/customerAdd',
        method: 'post',
        params: { token },
        data
    })
}

export function getCustomerInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/getCustomerInfo/' + data.id,
        method: 'get',
        params: { token },
    })
}


export function customerUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/customerUpdate/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}




