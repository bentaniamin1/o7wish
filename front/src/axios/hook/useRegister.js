import axiosInstance from '../Axios';

export default function useRegister() {
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
