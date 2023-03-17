import axiosInstance from '../Axios';

export default function useUploadSite() {
    return (data) => {
        return (
            axiosInstance.post('/uploadfileorfolder', data, {
                header: {
                    "Content-Type": 'multipart/form-data',
                    "Authorization": `Bearer ${data.myJWT}`
                }
            })
                .catch(error => console.log(error))
            // axiosInstance({
            //     url: '/uploadfileorfolder',
            //     method: 'post',
            //     headers: {
            //         "Content-Type": 'multipart/form-data',
            //         "Authorization": `Bearer ${data.myJWT}`
            //     },
            //     data: new URLSearchParams({
            //         username: data.username,
            //         password: data.password,
            //         projectName: data.projectName
            //     })
            // })
            //     .then(res => (res.data))
            //     .catch(error => (console.log(error)))
        );
    };
}