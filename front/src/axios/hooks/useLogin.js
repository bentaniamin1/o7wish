import axiosInstance from '../Axios';

export default function useLogin() {
    return (data) => {
        return (
            axiosInstance({
                url: '/login',
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: new URLSearchParams({
                    pseudo: data.pseudo,
                    password: data.password
                })
            })
                .then(res => (res.data))
                .catch(error => (console.log(error)))
        );
    };
}
