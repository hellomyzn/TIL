import React, { useState } from "react";
import jsonplaceholder from "./apis/jsonplaceholder";

// import Button from "./Button";
import Button from "./components/Button";
import Counter from "./components/Counter";
import Resources from "./components/Resources";
import SearchBar from "./components/SearchBar";

const App = () => {
  const [resources, setResources] = useState([]);
  const getPosts = async () => {
    try {
      const posts = await jsonplaceholder.get("/posts");
      setResources(posts.data);
    } catch (error) {
      console.log(error);
    }
  };

  const getAlbums = async () => {
    try {
      const albums = await jsonplaceholder.get("/albums");
      setResources(albums.data);
    } catch (error) {
      console.log(error);
    }
  };

  const onSearchSubmit = (term) => {
    console.log(term);
  };
  return (
    <div className="ui container" style={{ marginTop: "30px" }}>
      {/* <Button title="post" />
      <Button title="edit" />
      <Button title="delete" />
      <Button title="submit" /> */}
      {/* <Counter /> */}
      {/* <Button onClick={getPosts} color="primary" text="Posts" />
      <Button onClick={getAlbums} color="red" text="Albums" /> */}
      {/* <Resources resources={resources} /> */}
      <SearchBar onSubmit={onSearchSubmit} />
    </div>
  );
};

export default App;
