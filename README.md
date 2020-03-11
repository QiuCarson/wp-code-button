
### dux主题 插件
在我的博客使用dux主题的时候用的就是这个版本，样式上没有什么问题，有问题请到[小松博客](https://www.phpsong.com/1645.html)留言

#### 注意

dux主题默认已经加载了，并开启了代码美化，需要注释代码

修改dux模板目录下main.js

```
wp-content/themes/DUX_v6.1/js/main.js
```

找到以下代码并且注释

```
/* 
 * prettyprint
 * ====================================================
*/
$('pre').each(function(){
    if( !$(this).attr('style') ) $(this).addClass('prettyprint')
})

if( $('.prettyprint').length ){
    tbquire(['prettyprint'], function(prettyprint) {
        prettyPrint()
    })
}
```

然后 插件直接传到wordpress插件目录就可以了



