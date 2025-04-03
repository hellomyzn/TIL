
export const EditForm = ({title, description, onTtitleChange, onDescriptionChange, onSave, onCancel}) => (
  <div>
    <label htmlFor="title">title</label>
    <input type="text" label="title" value={title} onChange={onTtitleChange}/>
    <br />
    <label htmlFor="description">description</label>
    <textarea name="description" id="" value={description} onChange={onDescriptionChange}></textarea>
    <br />
    <button onClick={onSave}>save</button>
    <button onClick={onCancel}>cancel</button>
  </div>
)