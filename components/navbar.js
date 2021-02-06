import React, {Component} from 'react';
import API from '../libs/axios';
import {LoginUrl} from '../libs/url';
import Loader from 'react-loader';
import SearchResults from './search';
import Pengaturan from './pengaturan'; 
import {Container, Navbar, Nav, NavItem, Button, Form, FormControl} from 'react-bootstrap';
import {BsThreeDotsVertical, BsBoxArrowInRight, BsSearch} from 'react-icons/bs';
import { toast } from 'react-toastify';
 
var options = {
  lines: 13,
  length: 20,
  width: 10,
  radius: 30,
  scale: 0.35,
  corners: 1,
  color: '#fff',
  opacity: 0.25,
  rotate: 0,
  direction: 1,
  speed: 1,
  trail: 60,
  fps: 20,
  zIndex: 2e9,
  top: '50%',
  left: '50%',
  shadow: false,
  hwaccel: false,
  position: 'absolute'
};
class Navigation extends Component{
  constructor(props) {
    super(props)
    this.state = {
        query: '',
        results: [],
        Pengaturan: [],
        loading: true,
        LoginUrl: LoginUrl()
      }
      this.handlerChange = this.handlerChange.bind(this)
        this.handlerSubmit = this.handlerSubmit.bind(this)
    }
    handlerChange = (event) => {
      this.setState({
          [event.target.name] : event.target.value
      })
    }

  componentDidMount = () => {
      API.GetPengaturan().then(res => {
        console.log(res);
        setTimeout(() => this.setState({
              Pengaturan: res.data,
              loading: false
         }), 100);
      })
 }
      
handlerSubmit = (event) => {
  event.preventDefault()
  //console.log(event)
  const query=this.state.query
  API.CariOrang(query).then(res=>{
    //console.log(res)
    setTimeout(() => {
    if (res.data.length > 0) {
      this.setState({
        results: res.data,
        loading: false
      })
      API.PostHadir(this.state).then(res => {
        console.log(res)
      });
      toast.success("Berhasil, selamat datang tamu undangan", {position: "top-right"});
    } else {
      this.setState({
        results: res.data,
        loading: false
      })
      toast.warn("Perhatian, nomor tamu undangan tidak ada", {position: "top-right"}); 
    }
   }, 100);
      
  })
 
  
}

  render(){
    
        return(
       <>

        <Navbar className="shadow mb-3" variant="dark" expand="lg" style={{backgroundColor:"#B68364",height:"60px"}}>
          <Container fluid>
        <Navbar.Brand href="./" alt=""><BsThreeDotsVertical size="34"/></Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />

        <Navbar.Collapse id="basic-navbar-nav">
            
          <Form onSubmit={this.handlerSubmit} inline>
            <FormControl 
            type="text" 
            name="query" 
            ref={input => this.search = input}
            onChange={this.handlerChange} 
            placeholder="Scan QR Code..." 
            className="mr-sm-2" required autoFocus={true} />
            <Button type="submit" variant="warning"><BsSearch size="18"/></Button>
          </Form>

            
          <Nav className="ml-auto">

        <NavItem className="navItem">
          <a className="btn btn-primary" href={this.state.LoginUrl}><BsBoxArrowInRight size="18"/> Login</a>
        </NavItem>

        </Nav>

        </Navbar.Collapse>
        </Container>
        </Navbar>
                  
                  
        {this.state.results.length > 0 ? (
            
            (this.state.loading
            ?
            <Loader options={options} className="spinner" />
            :
            
             <SearchResults data={this.state.results} />
            )
            
        ): (

          (this.state.loading
            ?
            <Loader options={options} className="spinner" />
            :
            
            <Pengaturan data={this.state.Pengaturan} />
            
          )
              
        )}
      
        </>
        )
    }
}

export default Navigation;