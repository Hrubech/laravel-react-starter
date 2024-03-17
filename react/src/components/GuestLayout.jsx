import {Navigate, Outlet} from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

export default function GuestLayout() {
  const { user, token } = useStateContext();
  console.log(user.roles)
  if (token) {
    // Si un token est présent, vérifie le rôle de l'utilisateur
    const isAdmin = user.roles.some(role => role.name === "admin");
    const isDoctor = user.roles.some(role => role.name === "doctor");

    if (isAdmin) {
      // Redirige vers le tableau de bord de l'administrateur si l'utilisateur a le rôle "admin"
      return <Navigate to="/admin-dashboard" />;
    } else if (isDoctor) {
      // Redirige vers le tableau de bord du médecin si l'utilisateur a le rôle "doctor"
      return <Navigate to="/doctor-dashboard" />;
    } else {
      // Redirige vers la page d'accueil par défaut si le rôle de l'utilisateur n'est pas spécifié ou incorrect
      return <Navigate to="/" />;
    }
  }

  return (
    <div id="guestLayout">
      <Outlet />
    </div>
  );
}
