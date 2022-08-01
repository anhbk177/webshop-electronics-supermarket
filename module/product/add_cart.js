const button = document.querySelector('button')
const alert = document.querySelector('.alert')

button.addEventListener('click', () => {
  alert.style.right = '20px'
  let length = 70
  let process = document.querySelector('.process')
  const run = setInterval(() => {
    process.style.height = length + 'px'
    length -= 5
    if (length <= -10) {
      clearInterval(run)
      alert.style.right = '-500px'
    }
  }, 200)
})