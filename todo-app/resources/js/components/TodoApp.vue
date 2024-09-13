<template>
    <div>
      <h1>To-Do List</h1>
  
      <!-- Display To-do Items -->
      <ul>
        <li v-for="todo in todos" :key="todo.id">
          <strong>{{ todo.title }}</strong>
          <p>{{ todo.description }}</p>
          <button @click="deleteTodo(todo.id)">Delete</button>
        </li>
      </ul>
  
      <!-- Add New To-do -->
      <h2>Add New To-do</h2>
      <form @submit.prevent="addTodo">
        <input v-model="newTodo.title" type="text" placeholder="To-do title" required>
        <textarea v-model="newTodo.description" placeholder="To-do description"></textarea>
        <button type="submit">Add</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        todos: [],
        newTodo: {
          title: '',
          description: ''
        }
      };
    },
    mounted() {
      this.fetchTodos();
    },
    methods: {
      async fetchTodos() {
        try {
          const response = await fetch('/api/todos');
          this.todos = await response.json();
        } catch (error) {
          console.error('Error fetching todos:', error);
        }
      },
      async addTodo() {
        try {
          await fetch('/api/todos', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(this.newTodo)
          });
          this.fetchTodos();
          this.newTodo.title = '';
          this.newTodo.description = '';
        } catch (error) {
          console.error('Error adding todo:', error);
        }
      },
      async deleteTodo(id) {
        try {
          await fetch(`/api/todos/${id}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          });
          this.fetchTodos();
        } catch (error) {
          console.error('Error deleting todo:', error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  