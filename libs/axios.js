import Axios from 'axios'

const RootPath = "http://localhost/wedding-nextjs/api/"

// Authorization
// key = blog123
// Gunakan https://www.base64decode.org untuk melakukan encode key diatas menjadi format base64
var key = new Buffer.from('YmxvZzEyMw==', 'base64')
const ApiKey = key.toString();
const config = { headers: { 'X-API-KEY': `${ApiKey}` } };

const GET = (path) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.get(RootPath+path, config).then(res=>{
            resolve(res.data)
        },err=>{
            reject(err)
        })
    })
    return promise
}

const GET_ID = (path,id) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.get(RootPath+path+id, config).then(res=>{
            resolve(res.data)
        },err=>{
            reject(err)
        })
    })
    return promise
}

const GET_ID_VAL = (path,data) => {
    const promise = new Promise((resolve,reject) => {
        Axios.get(RootPath+path+data, config).then(res => {
            resolve(res.data)
        }).catch(err => {
            reject(err)
        })
    })
    return promise
}

const LOGIN = (path,data) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.post(RootPath+path,data, config).then(res=>{
            resolve(res.data)
        },err=>{
            reject(err)
        })
    })
    return promise
}

const PUT = (path,data) =>{
    const promise = new Promise((resolve,reject)=>{
         Axios.put(RootPath+path,data, config).then(res=>{
             resolve(res.data)
         },err=>{
             reject(err)
         })
    })
    return promise
 }

const POST = (path,data) =>{
    const promise = new Promise((resolve,reject)=>{
         Axios.post(RootPath+path,data, config).then(res=>{
             resolve(res.data)
         },err=>{
             reject(err)
         })
    })
    return promise
 }

const Delete = (path,id) => {
    const promise = new Promise((resolve,reject) => {
        Axios.delete(RoothPath+path+id, config).then(res =>{
            resolve(res.data.status)
        },(err)=>{
            reject(err)
        })
    })
    return promise
}
 
const CariOrang = (data) => GET_ID_VAL('SearchController?id=',data);
const GetPengaturan = () => GET('PengaturanController');
const PostHadir = (data) => POST('HadirController',data);
const PostLogin = (data) => LOGIN('LoginController',data);
const GetUser = () => GET('UserController');
const GetUserId = (data) => GET_ID('UserController?id=',data);
const PostUser = (data) => POST('UserController',data);
const PutUser = (data) => PUT('UserController',data);
const DeleteUser = (id) => Delete('UserController/index_delete?id=',id);

const API = {
    CariOrang,
    GetPengaturan,
    PostHadir,
    PostLogin,
    GetUser,
    GetUserId,
    PostUser,
    PutUser,
    DeleteUser
}

export default API
