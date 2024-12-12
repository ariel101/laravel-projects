
import { defineStore } from 'pinia';
import axios from 'axios';

export const useCategoryStore = defineStore('category', {
  state: () => ({
    categories: []
  }),
  actions: {
    async fetchCategories() {
      try {
        const response = await axios.get('/categories');
        this.categories = response.data;
      } catch (error) {
        console.error('Error fetching categories', error);
      }
    }
  }
});
