import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getLoanList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/index',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function getLoanInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/show/' + data.id,
        method: 'get',
        params: { token },
    })
}
 

export function loanAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/store',
        method: 'post',
        params: { token },
        data
    })
}


export function loanUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/update/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}



export function deleteOportunity(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/destroy/' + data.id,
    method: 'delete',
    params: {token},
    data
  }) 
}

