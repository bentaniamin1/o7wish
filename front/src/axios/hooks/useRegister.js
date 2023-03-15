import axiosInstance from '../Axios';

export default function getUsers() {
    return (data) => {
        return (
            axiosInstance
                .post('/api/users', data)
                .then((res) => res.data)
                .catch((error) => console.log(error))
        );
    };
}
