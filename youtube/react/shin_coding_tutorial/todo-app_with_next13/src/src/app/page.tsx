import Image from 'next/image'

export default function Home() {
  return (
    <main>
      <h1>Nextjs 13 todo app</h1>
      <div>
        <div>
          <AddTask />
          <TodoList />
        </div>
      </div>
    </main>
  )
}
