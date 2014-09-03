<?php if(!defined('KIRBY')) exit ?>

# Design blueprint

title: Portfolio Page
pages:
  template: portfolio
files: true
fields:
  title: 
    label: Title
    type:  text
  text: 
    label: Text
    type:  textarea
    size:  large
  tags:
    label: Tags
    type: multicheckbox
    options:
      web: web
      graphic: graphic
      print: print
      ux: ux
  color:
    label: Color (RGBA)
    type: text
    help: ex. rgba(101,101,101,1)
    validate:
      match: /rgba\([0-9]+,[0-9]+,[0-9]+,[0-9]+\)/i
filefields: 
  caption: 
    label: Caption
    type:  text

