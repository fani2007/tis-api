import axios from 'axios'
import { ref } from 'vue'
import type { Book } from '../models/book'

const API_URL = 'http://localhost:8000/api/books'

export function useBook() {
  const books = ref<Book[]>([])
  const loading = ref(false)

  const getBooks = async () => {
    loading.value = true
    const res = await axios.get(API_URL)
    books.value = res.data.data
    loading.value = false
  }

  const createBook = async (data: Book) => {
    await axios.post(API_URL, data)
    await getBooks()
  }

  const updateBook = async (id: number, data: Book) => {
    await axios.put(`${API_URL}/${id}`, data)
    await getBooks()
  }

  const deleteBook = async (id: number) => {
    await axios.delete(`${API_URL}/${id}`)
    await getBooks()
  }

  return {
    books,
    loading,
    getBooks,
    createBook,
    updateBook,
    deleteBook
  }
}