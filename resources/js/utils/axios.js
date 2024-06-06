import axios from "axios";

const customFetch = axios.create({
    baseURL: "http://auth-sanctum.test/api",
    withCredentials: true,
    withXSRFToken: true,
    headers: {
        "Content-Type": "application/json",
    },
});

export { customFetch };
