import axios from "axios";

const customFetch = axios.create({
    baseURL: "http://auth-sanctum.test",
    withCredentials: true,
    withXSRFToken: true,
    headers: {
        "Content-Type": "application/json",
    },
});

export { customFetch };
