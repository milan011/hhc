import request from '@adminPc/utils/request'
import { getToken } from '@adminPc/utils/auth'
import { ROAST_CONFIG } from '../config.js'

let token = getToken()

export function getCarList(query, token = getToken()) {
    return request({
        // url: '/user/list',
        url: ROAST_CONFIG.API_URL + '/carList',
        method: 'get',
        params: { token, query, page: query.page }
    })
}

export function getCarInfo(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/getCarInfo/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function carTouch(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carTouch/' + data.id,
        method: 'post',
        data,
        params: { token },
    })
}

export function carInfoAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carInfoAdd',
        method: 'post',
        params: { token },
        data
    })
}

export function carImageAdd(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carImageAdd',
        method: 'post',
        params: { token },
        data
    })
}

export function carInfoUpdate(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carInfoUpdate/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}

export function carImageDelete(data) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carImageDelete/' + data.ID,
        method: 'put',
        params: { token },
        data
    })
}

export function carSaleOrUnsale(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carSaleOrUnsale/' + data.id,
        method: 'get',
        params: { token },
    })
}

export function carFollow(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carFollow/' + data.id,
        method: 'put',
        params: { token },
        data
    })
}

export function carTrans(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carTrans/' + data.id,
        method: 'put',
        params: { token },
        data
    })
}

export function carPingGu(data, token = getToken()) {
    return request({
        url: ROAST_CONFIG.API_URL + '/carPingGu/' + data.id,
        method: 'put',
        params: { token },
        data
    })
}

/*export function getRoles(query, token = getToken()) {
  return request({
    // url: '/user/list',
    url: ROAST_CONFIG.API_URL + '/roleList',
    method: 'get',
    query,
    params: {token, page:query.page}
  })
}

export function getUserRoles(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/user/' + data.id + '/roles',
    method: 'get',
    params: {token},
    data
  }) 
}



export function giveUserRoles(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/giveUser/' + data.id + '/roles',
    method: 'post',
    params: {token},
    data
  }) 
}

export function createUser(data) {
  return request({
    url: ROAST_CONFIG.API_URL + '/user',
    method: 'post',
    params: { token },
    data
  })
}

export function resetPassword(data) {
  return request({
    url: ROAST_CONFIG.API_URL + '/resetPassword',
    method: 'post',
    params: { token },
    data
  })
}

export function updateUser(data) {
  return request({
    url: ROAST_CONFIG.API_URL + '/user/' + data.id,
    method: 'put',
    params: { token },
    data
  })
}
export function deleteUser(data, token = getToken()) {
  return request({
    url: ROAST_CONFIG.API_URL + '/user/' + data.id,
    method: 'delete',
    params: {token},
    data
  }) 
}*/