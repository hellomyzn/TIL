
export const AddForm = ({title, description, onTtitleChange, onDescriptionChange, onAdd }) => (
  <div>
    <label htmlFor="title">title</label>
    <input type="text" label="title" value={title} onChange={onTtitleChange}/>
    <br />
    <label htmlFor="description">description</label>
    <textarea value={description} onChange={onDescriptionChange}></textarea>
    <br />
    <button onClick={onAdd}>add</button>
  </div>
)