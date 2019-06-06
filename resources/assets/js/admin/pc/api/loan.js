import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getLoanList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/loanList',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function getLoanInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/getLoan/' + data.id,
        method: 'get',
        params: { token },
    })
}
 

export function loanAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/loan',
        method: 'post',
        params: { token },
        data
    })
}


export function loanUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/loan/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}



export function deleteLoan(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/loan/' + data.id,
    method: 'delete',
    params: {token},
    data
  }) 
}

