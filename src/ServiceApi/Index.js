import Axios from 'axios'

export const SiteUrl = () => {
    return "http://localhost/wedding-guestbook-app/api/"
}
export const LoginUrl = () => {
    return "http://localhost/wedding-guestbook-app/login/"
}

export const ImagesUrl = () => {
    return "http://localhost/wedding-guestbook-app/assets/images/"
}

export const PhotosUrl = () => {
    return "http://localhost/wedding-guestbook-app/assets/images/photos/"
}

const RoothPath = "http://localhost/wedding-guestbook-app/api/"

const GET = (path) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.get(RoothPath+path).then(res=>{
            resolve(res.data.data)
        },err=>{
            reject(err)
        })
    })
    return promise
}

const GET_ID = (path,id) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.get(RoothPath+path+id).then(res=>{
            resolve(res.data.data[0])
        },err=>{
            reject(err)
        })
    })
    return promise
}

const GET_ID_VAL = (path,data) => {
    const promise = new Promise((resolve,reject) => {
        Axios.get(RoothPath+path+data).then(res => {
            resolve(res.data.data)
        }).catch(er => {
            reject(er)
        })
    })
    return promise
}

const POST = (path,data) =>{
    const promise = new Promise((resolve,reject)=>{
         Axios.post(RoothPath+path,data).then(res=>{
             resolve(res.data)
         },err=>{
             reject(err)
         })
    })
    return promise
 }

const LOGIN = (path,data) => {
    const promise = new Promise((resolve,reject)=>{
        Axios.post(RoothPath+path,data).then(res=>{
            resolve(res.data)
        },err=>{
            reject(err)
        })
    })
    return promise
}

const PUTUSER = (path,data) =>{
    const promise = new Promise((resolve,reject)=>{
         Axios.put(RoothPath+path,data).then(res=>{
             resolve(res.data)
         },err=>{
             reject(err)
         })
    })
    return promise
 }

const POSTUSER = (path,data) =>{
    const promise = new Promise((resolve,reject)=>{
         Axios.post(RoothPath+path,data).then(res=>{
             resolve(res.data)
         },err=>{
             reject(err)
         })
    })
    return promise
 }

const Delete = (path,id) => {
    const promise = new Promise((resolve,reject) => {
        Axios.delete(RoothPath+path+id).then(res =>{
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
const PostUser = (data) => POSTUSER('UserController',data);
const PutUser = (data) => PUTUSER('UserController',data);
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
