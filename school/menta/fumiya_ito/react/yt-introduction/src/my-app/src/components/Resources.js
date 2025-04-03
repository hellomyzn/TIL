import React from "react";
const Resources = ({ resources }) => {
  return (
    <React.Fragment>
      {resources.map((resource) => {
        return <p key={resource.id}>{resource.title}</p>; // return を追加
      })}
    </React.Fragment>
  );
};

export default Resources;
