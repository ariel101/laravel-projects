import { defineStore } from "pinia";
import axiosInstance from '../service/axios'

export const usePropietarioStore = defineStore('propietarios',{
    state:()=>({
        propietarios:[]
    }),
    actions:{
        async fetchPropietarios(){
            try {
                const response = await axiosInstance.get('/propietario')
                this.propietarios = response.data
            } catch (error) {
                console.error('Error al obtener los propietarios',error)
            }
        }
    }
})