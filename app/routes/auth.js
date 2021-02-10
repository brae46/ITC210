const { authenticate } = require(`../util`)
const express = require(`express`)
const router = express.Router()

const passport = require('passport')

router.get(`/google`, passport.authenticate('google', { scope: [`https://www.googleapis.com/auth/userinfo.email`]}))

router.get(`/google/callback`,
    passport.authenticate(`google`),
    async(req, res) => {
        req.session.save(err => {
            if (err) {
                req.logout()
                res.sendStatus(500)
            }
            else{
                console.log(process.env.CLIENT_ORIGIN)
                res.redirect(process.env.CLIENT_ORIGIN)
            } 
        })
    })
router.get(`/logout`, async (req,res) => {
    req.session.destroy()
    req.logout()
    res.redirect(process.env.CLIENT_ORIGIN)
})
router.get(`/`, authenticate, (req, res) => {
        res.send(req.user)
})

module.exports = router





