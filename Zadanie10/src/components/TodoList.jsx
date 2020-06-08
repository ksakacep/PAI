import React, { useState } from 'react'

const TodoList = () => {
  const [ items, setItems ] = useState([])
  const [ hide, setHide ] = useState(false)
  const [ input, setInput ] = useState('')

  const handleChange = e => {
    setInput(e.target.value)
  }

  const handleHide = () => setHide(!hide)

  const handleCheck = i => e => {
    const filtered = items.filter(item => item.id != i.id)
    setItems([ ...filtered, { ...i, checked: !i.checked }])
  }

  const handleSubmit = e => {
    setItems([ ...items, { id: items.length+1, value: input, checked: false}])
    setInput('')
  };

  return (<div>
    <h3>My Todo List</h3>
    <div className='hide'>
            <input 
              type='checkbox' 
              defaultChecked={ hide }
              onChange={ handleHide } />
            <p>Hide completed</p>
            </div>
    <ul>
      {
        items.sort((a,b) => a.id > b.id ? 1 : -1).filter(i => hide ? !i.checked : true).map(i => (
          <li key={i.id}>
            <input 
              type='checkbox' 
              checked={i.checked}
              onChange={ handleCheck(i) } />
            <p className={ i.checked ? 'checked' : ''}>{i.value}</p>
          </li>
        ))
      }
    </ul>
    <div class='add'>
    <input type='text' value={input} onChange={handleChange}/>
    <p onClick={handleSubmit}>Add</p>
    </div>
  </div>)

}

export default TodoList