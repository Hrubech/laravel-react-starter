import {useEffect, useState} from "react";
import axiosClient from "../../axios-client.js";
import {Link} from "react-router-dom";
import {useStateContext} from "../../context/ContextProvider.jsx";

export default function Assurances() {
  const [assurances, setAssurances] = useState([]);
  const [loading, setLoading] = useState(false);
  const {setNotification} = useStateContext()

  useEffect(() => {
    getAssurances();
  }, [])

  const onDeleteClick = assurance => {
    if (!window.confirm("Are you sure you want to delete this assurance?")) {
      return
    }
    axiosClient.delete(`/assurances/${assurance.id}`)
      .then(() => {
        setNotification('Assurance was successfully deleted')
        getAssurances()
      })
  }

  const getAssurances = () => {
    setLoading(true)
    axiosClient.get('/assurances')
      .then(({ data }) => {
        setLoading(false)
        setAssurances(data.data)
      })
      .catch(() => {
        setLoading(false)
      })
  }

  return (
    <div>
      <div style={{display: 'flex', justifyContent: "space-between", alignItems: "center"}}>
        <h1>Assurances</h1>
        <Link className="btn-add" to="/assurances/new">Add new</Link>
      </div>
      <div className="card animated fadeInDown">
        <table>
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Create Date</th>
            <th>Actions</th>
          </tr>
          </thead>
          {loading &&
            <tbody>
            <tr>
              <td colSpan="5" className="text-center">
                Loading...
              </td>
            </tr>
            </tbody>
          }
          {!loading &&
            <tbody>
            {!loading && assurances && assurances.map(u => (
              <tr key={u.id}>
                <td>{u.id}</td>
                <td>{u.nom}</td>
                <td>{u.description}</td>
                <td>{u.created_at}</td>
                <td>
                  <Link className="btn-edit" to={'/assurances/' + u.id}>Edit</Link>
                  &nbsp;
                  <button className="btn-delete" onClick={ev => onDeleteClick(u)}>Delete</button>
                </td>
              </tr>
            ))}
            </tbody>
          }
        </table>
      </div>
    </div>
  )
}