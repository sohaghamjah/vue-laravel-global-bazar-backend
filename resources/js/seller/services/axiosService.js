import axios from "axios";
import { useAuth, useToken } from "@/seller/stores";

const axiosInstance = axios.create({
    baseURL: "/api/v1",
});
  
axiosInstance.interceptors.request.use(function (config) {
    const authInfo = useToken();
    config.headers.common["Authorization"] = `Bearer ${authInfo.getToken}`;
    return config;
  }, function (error) {
    return Promise.reject(error);
});

// Auto logout
axiosInstance.interceptors.response.use( (response) => {
 return response;
}, (error) => {
  if(error.response && error.response.status == 401){
    const authInfo = useAuth();
    authInfo.removeToken();
  }
  return Promise.reject(error);
});
  
export default axiosInstance;