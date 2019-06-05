import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getWantList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/wantList',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function getWantInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/getWantInfo/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function wantTouch(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantTouch/' + data.id,
        method: 'post',
        data,
        params: { token },
    })
}

export function wantInfoAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantInfoAdd',
        method: 'post',
        params: { token },
        data
    })
}


export function wantInfoUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantInfoUpdate/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}



export function wantSaleOrUnsale(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantSaleOrUnsale/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function wantFollow(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantFollow/' + data.id,
        method: 'put',
        params: { token },
        data
    })
}

export function wantTrans(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/wantTrans/' + data.id,
        method: 'put',
        params: { token },
        data
    })
}

