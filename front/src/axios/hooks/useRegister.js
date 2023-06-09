import axiosInstance from '../Axios';

export default function useRegister() {
    return (data) => {
        return (
            axiosInstance({
                url: '/register',
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: new URLSearchParams({
                    pseudo: data.pseudo,
                    password: data.password,
                    email: data.email
                })
            })
                .then(res => (res.data))
                .catch(error => (console.log(error)))
        );
    };
}