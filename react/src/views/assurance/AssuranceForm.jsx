import {useNavigate, useParams} from "react-router-dom";
import {useEffect, useState} from "react";
import axiosClient from "../../axios-client.js";
import {useStateContext} from "../../context/ContextProvider.jsx";

export default function AssuranceForm() {
  const navigate = useNavigate();
  let {id} = useParams();
  const [assurance, setAssurance] = useState({
    id: null,
    nom: '',
    description: '',
    image: '',
    taux: ''
  })
  const [errors, setErrors] = useState(null)
  const [loading, setLoading] = useState(false)
  const {setNotification} = useStateContext()

  if (id) {
    useEffect(() => {
      setLoading(true)
      axiosClient.get(`/assurances/${id}`)
        .then(({data}) => {
          setLoading(false)
          setAssurance(data)
        })
        .catch(() => {
          setLoading(false)
        })
    }, [])
  }

  const onSubmit = ev => {
    ev.preventDefault()
    if (assurance.id) {
      axiosClient.put(`/assurances/${assurance.id}`, assurance)
        .then(() => {
          setNotification('Assurance was successfully updated')
          navigate('/assurances')
        })
        .catch(err => {
          const response = err.response;
          if (response && response.status === 422) {
            setErrors(response.data.errors)
          }
        })
    } else {
      axiosClient.post('/assurances', assurance)
        .then(() => {
          setNotification('Assurance was successfully created')
          navigate('/assurances')
        })
        .catch(err => {
          const response = err.response;
          if (response && response.status === 422) {
            setErrors(response.data.errors)
          }
        })
    }
  }

  return (
    <>
      {assurance.id && <h1>Update Assurance: {assurance.nom}</h1>}
      {!assurance.id && <h1>New Assurance</h1>}
      <div className="card animated fadeInDown">
        {loading && (
          <div className="text-center">
            Loading...
          </div>
        )}
        {errors &&
          <div className="alert">
            {Object.keys(errors).map(key => (
              <p key={key}>{errors[key][0]}</p>
            ))}
          </div>
        }
        {!loading && (
          <form onSubmit={onSubmit}>
            <input value={assurance.nom} onChange={ev => setAssurance({...assurance, nom: ev.target.value})} placeholder="Nom"/>
            <input value={assurance.description} onChange={ev => setAssurance({...assurance, description: ev.target.value})} placeholder="Description"/>
            <input value={assurance.image} onChange={ev => setAssurance({...assurance, image: ev.target.value})} placeholder="Image"/>
            <input type="number" value={assurance.taux} onChange={ev => setAssurance({...assurance, taux: ev.target.value})} placeholder="Taux"/> 
            <button className="btn">Save</button>
          </form>
        )}
      </div>
    </>
  )
}