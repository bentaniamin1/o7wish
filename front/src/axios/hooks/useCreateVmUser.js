import axiosInstance from '../Axios';

export default function useCreateVmUser() {
    return (data) => {
        return (
            axiosInstance({
                url: '/createuser',
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `Bearer ${data.myJWT}`
                },
                data: new URLSearchParams({
                    username: data.username,
                    password: data.password,
                    projectName: data.projectName
                })
            })
                .then(res => (res.data))
                .catch(error => (console.log(error)))
        );
    };
}