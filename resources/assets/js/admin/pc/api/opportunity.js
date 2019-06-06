import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getOpportunityList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/opportunityList',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function getOpportunityInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/getOpportunity/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function assingOpportunityInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/opportunityAssign/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function opportunityInfoAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/opportunity',
        method: 'post',
        params: { token },
        data
    })
}


export function opportunityInfoUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/opportunity/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}



export function deleteOportunity(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/opportunity/' + data.id,
    method: 'delete',
    params: {token},
    data
  }) 
}

