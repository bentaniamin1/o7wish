import axiosInstance from '../Axios';

export default function useRegister() {
    return () => {
        return (
            axiosInstance ({
                url : "/api/v2/pokemon/ditto",
                method : 'get',
            })
                .then((res) => res.data)
                .catch((error) => console.log(error))
        );
    };
}
