import axiosInstance from '../Axios';

export default function getUsers() {
    return () => {
        return (
            axiosInstance ({
                url : "/api/users",
                method : 'get',
            })
                .then((res) => res.data["hydra:member"])
                .catch((error) => console.log(error))
        );
    };
}
