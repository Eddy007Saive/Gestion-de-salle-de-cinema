import './bootstrap';
import "../css/app.css"
import '../sass/app.scss'
import $ from 'jquery';
import axios from 'axios';
import "@fortawesome/fontawesome-free/css/all.css"
import "animate.css"
import WOW from "wow.js"

const wows =new WOW();
wows.init()

const api = "http://127.0.0.1:8000/api/"
const selectMovie = $(".selectmovie")
const selectPlace=$(".selectplace")
// Récupere l image depuis la base
selectMovie.on("change", () => {
    let id = selectMovie.val()
    axios.get(api + "findImage/" + id).then((result) => {
        let image = result.data.image.image
        $(".image").attr('src', `http://127.0.0.1:8000/storage/images/${image}`)
    }).catch((err) => {
        console.log(err);
    });
})

// Récupere l image depuis la base
selectPlace.on("change", () => {
    let id = selectPlace.val()
    axios.get(api + "findPlace/" + id).then((result) => {
        $(".place").val(result.data.place.nbr_place)

    }).catch((err) => {
        console.log(err);
    });
})


