import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'https://pokeapi.co/',
});

export default axiosInstance;
