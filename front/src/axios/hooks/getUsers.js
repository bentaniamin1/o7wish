import axiosInstance from '../Axios';

export default function getUsers() {
    return () => {
        return (
            axiosInstance
                .get('/api/users')
                .then((res) => res.data["hydra:member"])
                .catch((error) => console.log(error))
        );
    };
}
