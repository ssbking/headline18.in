<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>{$sitetitle}</title>
<description>{$metadesc}</description>
<link>{$sitepath}</link>
{section name=newser loop=$newser}
<item>
<title>{$newser[newser].title|htmlspecialchars_decode|strip_tags|stripslashes|replace:"'":''|replace:'"':''} - {$sitetitle}</title>
<description>{if $newser[newser].image neq 0}<![CDATA[<img src="{$sitepath}/minthumb/{$newser[newser].image}" border="0" align="left" alt="" title="" />{$newser[newser].longdesc|htmlspecialchars_decode|strip_tags|truncate:280}]]>{else}{$newser[newser].longdesc|htmlspecialchars_decode|strip_tags|truncate:280}{/if}</description>
{if $rewritemod == 1}
<link>{$sitepath}/news/{$newser[newser].univer}/{$newser[newser].idblog}/{$newser[newser].helper}.html</link>
<guid>{$sitepath}/news/{$newser[newser].univer}/{$newser[newser].idblog}/{$newser[newser].helper}.html</guid>
{/if}
{if $rewritemod == 2}
<link>{$sitepath}/news.php?name={$newser[newser].univer}&amp;cat={$newser[newser].idblog}</link>
<guid>{$sitepath}/news.php?name={$newser[newser].univer}&amp;cat={$newser[newser].idblog}</guid>
{/if}
<pubDate>{$newser[newser].date|date_format:"%a, %e %b %Y %H:%M:%S"} GMT</pubDate>
</item>
{/section}
</channel>
</rss>