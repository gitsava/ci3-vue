from django import forms
from .models import Article, Tag
#from ckeditor.widgets import CKEditorWidget

class WdMultiple(forms.ModelMultipleChoiceField):
    def label_from_instance(self, member):
        return "%s" % member.name

class ArticleForm(forms.ModelForm):
    class Meta:
        model = Article
        fields = [
            'author','headline','sub_headline',
            'image','body','featured','tags',
            'slug','publish','status']
    #body = forms.CharField(widget=CKEditorWidget())
    tags = WdMultiple(
        queryset=Tag.objects.all(),
        widget=forms.CheckboxSelectMultiple
        )
    
    

"""
class TagForm(forms.ModelForm):
    class Meta:
        model = Tag
    pass
"""